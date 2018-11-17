from flask_cors import CORS, cross_origin
import flask
import numpy as np
from flask import Flask, render_template,request
from sklearn.externals import joblib
from gensim.models import Word2Vec
from gensim.models import word2vec
from flaskext.mysql import MySQL
# from nltk.stem import PorterStemmer
# from nltk.corpus import stopwords
# from nltk.tokenize import sent_tokenize, word_tokenize
# from nltk.tokenize import RegexpTokenizer
import nltk.data
# import pandas as pd
# from sklearn.feature_extraction.text import CountVectorizer
import nltk
# Import logging to log model building progress
import logging

# Import NumPy
import numpy as np

# Importing packages required for Spell Checking
# import re
# from collections import Counter
from gensim.models import Word2Vec
import json
import matplotlib.pyplot as plt
import io
import base64


mysql = MySQL()
app = Flask(__name__)
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = ''
app.config['MYSQL_DATABASE_DB'] = 'portal'
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
mysql.init_app(app)
tokenizer = nltk.data.load('tokenizers/punkt/english.pickle')


@app.route("/index")
def index():
   return flask.render_template('index.html')

performance=[0,1]
@app.route('/test')
def chartTest():
  objects=['Positive','Negative']
  values=performance
#   img = io.BytesIO()
#   plt.bar(y_pos, performance, align='center', alpha=0.5)   
#   plt.savefig('/static/images/new_plot.png')
#   img.seek(0)
#   plot_url = base64.b64encode(img.getvalue()).decode()
  
#   return '<img src="data:image/png;base64,{}">'.format(plot_url)
  return render_template('plot.html', values=values, labels=objects)
#   return render_template('plot.html', name = 'new_plot', url ='/static/images/new_plot.png')

caption=["Club is going great!!","Need to improve","You are dipping down!!"]
@app.route("/")
# @app.route('/predict', methods=['POST'])
@app.route('/predict')
@cross_origin(origin='localhost',headers=['Content- Type','Authorization'])
def make_prediction():
    # if request.method=='POST':
        # t = request.form['text']
        t=request.args.get('clubname')
        global performance
        model1 =Word2Vec.load('SentimentAnalysis_Word2VecModel')
        model = joblib.load('model.pkl')
        cursor = mysql.connect().cursor()
        cursor.execute("SELECT comments from feedback where club='" + t + "'")
        
        sentence=[]
        
        pos_g=0
        neg_g=0
        # part=''
        for row in cursor.fetchall() :
            
            part=" ".join(row[0].split(" ")) 
            # sentence.append(row[0].split(" "))
            part=part.lower()
            word_list=part.split(" ")
            # Sood
            vectors=[]
            #vectors = np.zeros((100,),dtype="float32")
            word_count =0
            for i in word_list:
                
                if i in list(model1.wv.vocab):
                    print('word:',i)
                    vectors.append(model1[i])

                    # Sood
                    # vectors = np.add(vectors, model1[i])
                    # word_count+=1
            # vectors = np.divide(vectors, )
            
            if vectors:
                prediction = model.predict(vectors)
                # label=[]
                print(prediction)
                # label=np.squeeze(prediction)
                # print(label)
                pos=0
                neg=0
                
                # print(label)
                if len(str(prediction))>0:
                    for i in prediction:
                        print(i)
                        if i==1:
                            pos=pos+1
                        else:
                            neg=neg+1
                    
                    if pos>neg:
                        pos_g=pos_g+1
                        print("Positive")    
                    else:
                        neg_g=neg_g+1
                        print("Negative")
                    
        #word_list.pop(-1)
        #print(word_list)
        #sents_counts = foovec.fit_transform(sentence)
        # foovec now contains vocab dictionary which maps unique words to indexes
        #print(sents_counts)
        
        
        #words = list(model1.wv.vocab)
        #print(words)
        #print(model1['great'])
        # vectors=[]
        # for i in word_list:
        #     if i in list(model1.wv.vocab):
        #         vectors.append(model1[i])
        # # for w in word_list:
        #     if w in list(model1.wv.vocab):
        #         vectors=[model1[w] for w in word_list]
        #word_vectors = model1.wv
        #print(word_vectors)
        #vectors = [model1[w] for w in sentence]
        #for i in vectors:
        #    print(vectors)
        # prediction = model.predict(vectors)
        # label=np.squeeze(prediction)
        # pos=0
        # neg=0
        # print(label)
        # for i in label:
        #     print(i)
        #     if i==1:
        #         pos=pos+1
        #     else:
        #         neg=neg+1
        
        performance[0]=pos_g
        performance[1]=neg_g
        if pos_g>neg_g:
            label="Positive"
        else:
            label="Negative"
        # #data = cursor.fetchall() 
        # sentence=''
        # testing_sentences=[]
        # testing_review_data=[]
        # for row in cursor.fetchall() :
        #      sentence=sentence+" "+ row[0]
        # for review in cursor.fetchall():
        #     # Append the sentences
        #     testing_sentences += review_to_sentences(review[0], tokenizer, True)
            
        #     # Append list of words
        #     testing_review_data.append(review_to_wordlist(review[0]))
        
        if pos_g>(neg_g+5):
            out=caption[0]
        elif pos_g<(neg_g):
            out=caption[2]
        else:
            out=caption[1]
        #for i in data:
        #    sentence=sentence+cursor.fetchone()
        # if you vector file is in binary format, change to binary=True
        #sentence = data.split(" ")
        #vectors = [model1[w] for w in testing_sentences]

        # vectors = getAvgFeatureVecs(testing_review_data, model1, vector_dimensions)
        # prediction = model.predict(vectors)
        #label = ExpMovingAverage(list(map(float,prediction)),10)
        # label=np.squeeze(prediction)
        return json.dumps({'caption':out})
        # chartTest(performance)
        
if __name__ == '__main__':
    CORS(app, resources=r'/*')
    model = joblib.load('model.pkl')
    app.run(host='0.0.0.0',port=5000, debug=True) 