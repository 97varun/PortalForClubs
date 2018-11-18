
# coding: utf-8

# In[3]:


import time # To calculate execution times

# Importing Word2Vec for Word Embeddings
from gensim.models import Word2Vec
from gensim.models import word2vec

# Importing NLP tools: NLTK
from nltk.stem import PorterStemmer
from nltk.corpus import stopwords
from nltk.tokenize import sent_tokenize, word_tokenize
from nltk.tokenize import RegexpTokenizer

# Importing Keras modules for Neural Network
from keras import backend
from keras import metrics
from keras import regularizers
from keras.models import Sequential
from keras.layers import Dense

# Importing data from NLTK
import nltk.data

# Import Pandas for dataframe manipulation
import pandas as pd

# Import logging to log model building progress
import logging

# Import NumPy
import numpy as np

# Importing packages required for Spell Checking
import re
from collections import Counter

# Miscellaneous Imports
import csv
import os





# In[14]:


# Word Vector dimensions
vector_dimensions = 100

# Word2Vec model Training Window
window_size = 5

# Number of workers used to create the Word2Vec model
number_of_workers = 2

# Minimum number of times a word must be present to be
# included in the Word2Vec model
min_word_count = 5

# Specify name of the Word2Vec model to load
# If no name is specified, a model is built
Word2VecModelName = ""

# Loading punkt tokenizer
tokenizer = nltk.data.load('tokenizers/punkt/english.pickle')

# Stemming of Words
stemmer = PorterStemmer()





# In[40]:


# Toggle stemming: 1 -> Enable; 0 -> Disable
stemming = 0

# Number of epochs for Neural Network Training
training_epochs = 100

# Training batch size
training_batch_size  = 10





# <h2> Helper Functions for Preprocessing a review</h2>




# <h3> Convert `raw_review` to a list of words </h3>




# In[12]:


def review_to_wordlist(raw_review):
    
    # The answer is converted to a list of meaningful words

    # Removing all numbers
    letters_only = re.sub("[^a-zA-Z]", " ", raw_review)

    # Converting all letters to lowercase
    words = letters_only.lower().strip().split()

    # Creating a set of stopwords
    stops = set(stopwords.words("english"))

    # Remove stopwords
    meaningful_words = [w for w in words if not w in stops] 

    # Stemming
    if(stemming):
        meaningful_words = [stemmer.stem(w) for w in words if not w in meaningful_words]

    return meaningful_words





# <h3> Convert `review` into sentences </h3>




# In[13]:


def review_to_sentences(review, tokenizer, remove_stopwords = False):
    
    # The answer is tokenized to form a list of sentences
    
    # Splitting each paragraph into sentences
    raw_sentences = tokenizer.tokenize(review.strip())

    # Loop over each sentence
    sentences = []
    for raw_sentence in raw_sentences:

        # If a sentence is empty, skip it
        if(len(raw_sentence) > 0):
            sentences.append(review_to_wordlist(raw_sentence))

    return sentences





# <h2> Preprocessing for Word2Vec Model </h2>




# In[6]:


reviews_train = []
for line in open('./data/movie_data/full_train.txt', 'r'):
    reviews_train.append(line.strip())
    
reviews_test = []
for line in open('./data/movie_data/full_test.txt', 'r'):
    reviews_test.append(line.strip())





# In[16]:


# Initialize empty lists
training_sentences = []
training_review_data = []
testing_sentences = []
testing_review_data = []





# In[17]:


for review in reviews_train:
    
    # Append the sentences
    training_sentences += review_to_sentences(review, tokenizer, True)
    
    # Append list of words
    training_review_data.append(review_to_wordlist(review))





# In[18]:


for review in reviews_test:
    
    # Append the sentences
    testing_sentences += review_to_sentences(review, tokenizer, True)
    
    # Append list of words
    testing_review_data.append(review_to_wordlist(review))





# <h2> Helper functions for Vector manipulation </h2>




# <h3> Function to create word vectors </h3>




# In[24]:


def makeFeatureVectors(words, model, num_features):
    
    # Create a word vectors of the words passed using the Word2Vec Model
    
    # Initial word vector to a zero vector
    featureVec = np.zeros((num_features,),dtype="float32")

    # Initialize Number of Words to 0
    nwords = 0
    
    # Index2word is a list that contains the names of the words in 
    # the model's vocabulary. Convert it to a set to improve speed
    index2word_set = set(model.wv.index2word)

    for word in words:
        if word in index2word_set:
            # Count the number of words
            nwords = nwords + 1
            # Create a vector by adding all word vectors it contains
            featureVec = np.add(featureVec,model[word])
    
    # Divide feature vector by 0 to get average word vector
    featureVec = np.divide(featureVec,nwords)

    return featureVec


# <h3> Function to create word vectors from a set of reviews </h3>

# In[29]:


def getAvgFeatureVecs(reviews, model, num_features):
    
    # Given a set of answers, calculate the average feature vector and return a 2D numpy array for each one 

    # Initialize a counter
    counter = 0

    # Allocate a 2D numpy array, for speed
    reviewFeatureVecs = np.zeros((len(reviews),num_features),dtype="float32")
    
    # Loop through the answers in an answer set
    for review in reviews:

        # Print a status message every 1000th answer
        if (counter%1000 == 0):
            print("Review %d of %d processed." % (counter, len(reviews)))
       
        # Get average feature vector for each answer in answer set
        reviewFeatureVecs[counter] = makeFeatureVectors(review, model, num_features)
       
        # Increment the counter
        counter = counter + 1

    return reviewFeatureVecs


# <h2> Building Word2Vector Model for Word Embeddings </h2>

# In[23]:


# Check if a Word2Vec Model name is specified
if(Word2VecModelName):
    # Load a locally saved model
    v2wmodel = Word2Vec.load(Word2VecModelName)
else:
    # Building the Word2Vec Model with the specified parameters
    v2wmodel = word2vec.Word2Vec(training_sentences, size=vector_dimensions, window=window_size, min_count=min_word_count, workers=number_of_workers)
    
    # Save Word2Vec model with specified Name
    v2wmodel.save("SentimentAnalysis_Word2VecModel")


# <h3> Embedding Train and Test Vectors </h3>

# In[30]:


# Get the answerTrainVectors using a Average Word Vectors
reviewTrainVectors = getAvgFeatureVecs(training_review_data, v2wmodel, vector_dimensions)

# Get the answerTestVectors using a Average Word Vectors
reviewTestVectors = getAvgFeatureVecs(testing_review_data, v2wmodel, vector_dimensions)


# <h3> Training labels </h3>

# In[31]:


target = [1 if i < 12500 else 0 for i in range(25000)]


# <h2> Neural Network </h2>

# <h3> Building the Neural Network Model </h3>

# In[45]:


# Use a sequential network architecture
model = Sequential()

# Input Layer: 100 Input Neurons, Output = 50, Activation = Rectified Linear Units
model.add(Dense(output_dim = 50, input_dim = vector_dimensions, activation = 'relu'))

# Output Layer: 50 Input Neurons, Output = 25, SoftMax Function
model.add(Dense(output_dim = 1, input_dim = 50, activation = 'softmax'))

# Compile the Neural Network
model.compile(loss = 'binary_crossentropy', optimizer = 'sgd',metrics=[metrics.mae, metrics.categorical_accuracy, 'accuracy'])

# Summary
model.summary()


# <h3> Training the Model </h3>

# In[51]:


get_ipython().system(" export CUDA_VISIBLE_DEVICES=''")

# Fit the model on the training data
model.fit(reviewTrainVectors, np.asarray(target), epochs = training_epochs, batch_size = training_batch_size)


