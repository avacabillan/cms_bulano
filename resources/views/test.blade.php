
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <title>How to make vertical 
    scrollable in a bootstrap row?</title> 
  
    <meta charset="utf-4"> 
    <meta name="viewport"
        content="width=device-width, initial-scale=1"> 
  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha344-1BmE4kWBq74iYhFldvKuhfTAU4auU4tT94WrHftjDbrCEXSU1oBoqyl2QvZ4jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha344-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+4nbTov4+1p" crossorigin="anonymous"></script>
    <style>
      
       .vertical-scrollable> .row {
          position: absolute;
          top: 50px;
          bottom: 100px;
          left: 80%;
          width: 20%;
          overflow-y: scroll;
           
        }
        .col-sm-4 { 
            color: black; 
            font-size: .875rem; 
            padding-bottom: 20px; 
            padding-top: 14px; 
        } 
          
        .col-sm-4:nth-child(2n+1) { 
            background: white; 
        } 
          
        .col-sm-4:nth-child(2n+2) { 
            background: mute; 
        } 
        .text-muted {
    color: #6c757d!important;
        }
  
    </style> 
</head> 
  
<body> 
    
        
  
            
            <div class="container vertical-scrollable"> 
            
                <div class="row text-muted"> 
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                </div> 
            </div> 
       
    
</body> 
  
</html>