
    <?php
    session_start(); extract($_SESSION);
        $club=$_SESSION['clubname'];
    ?>
    <script src="http://localhost/SE/min.js">
    </script>
    <script type="text/javascript">
    var club = "<?php echo $club ?>";
    </script>
    <script>
        console.log("Hi")
        console.log(club)
        // var senti='hello'
        var obj;
        $.get("http://localhost:5000/predict?clubname="+club,
        {
            // "name":"KFC",
        },
        function(data) {
            window.obj=JSON.parse(data);
            // senti=obj.label;
            console.log(obj.caption)
            
        });
        // $.getJSON("http://127.0.0.1", function(data) {
        //     console.log(data);
        // }
        // )
        // console.log(senti)
        $.get("http://localhost:5000/test",
        {},
        function(data){
            // $('#canvas').attr('src','/tempaltes/plot.html');
            // $('#caption').innerHTML=(window.obj.caption);
            // console.log(window.obj.caption);
            window.location="http://localhost:5000/test"
        });
        
    </script>
