<!DOCTYPE html>
<html>
<head lang="en"> 
    <link rel="stylesheet" href="style.css">
    <link href="store.php">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  
</head>
<body>
    
    <div class="container-fluid">
      <h1>Enter term(s) for your Moodboard</h1>

      <div style="padding-left: 40px;">
        <input type="text" id="searchInput1" placeholder="Enter Term 1">
        <input type="text" id="searchInput2" placeholder="Enter Term 2">
        <input type="text" id="searchInput3" placeholder="Enter Term 3">
        <button onclick="searchImages()">Generate</button>
     </div>
     <form action="" method="POST" id="form">
      <div class="moodboard" id="moodboard"></div>
        <button id='submit' class='submit'>Store Images</button>
    </form>

    <div>
        <p id="responseM"></p>
    </div>
    <a href="https://www.pexels.com">
        Photos provided by 
        <img src="https://images.pexels.com/lib/api/pexels.png" style="width: 50px;" />
        
    </a>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    $('#submit').click(function(event) {
        event.preventDefault(); // Prevent default button click behavior

        var imageSrc = $('.moodboard img').map(function() {
        return this.src;
      }).get();
        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'store.php',
            data: { imageSrc: imageSrc },//formData,
            success: function(response) {
                // Handle successful response
                alert(response);
                // Perform any other actions based on the response
            },
            error: function(xhr, status, error) {
                // Handle error
                alert('Error: ' + error);
            }
        });
    });
   // });
</script>

    <script src="pexels.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

</body>
</html>

