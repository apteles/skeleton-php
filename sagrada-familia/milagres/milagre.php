<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Milagres - Videos Milagres </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./assets/styles.css">
</head>
<?php
    require_once __DIR__ . '/config.php';

    $nomeCategoria = filter_input(INPUT_GET, 'categoria');
    $videosDir = "./videos";
    $pathVideos = sprintf("%s/%s", $videosDir, $nomeCategoria);
    $videos = [];

    if ($handle = opendir($pathVideos)) {
      while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
              $videos[] = sprintf("%s/%s", $pathVideos, $entry);
          }
      }
      closedir($handle);
  }

?>
<body class="container">
    <nav>
        <img class="image" src="./images/brasao_colorido.png" alt="">
    </nav>
    <main id="videos">
      <div class="default-color back-buttom">
        <a href="./index.php">
            <span>VOLTAR MENU PRINCIPAL</span>
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M11.729 5.055a.5.5 0 0 0-.52.038L8.5 7.028V5.5a.5.5 0 0 0-.79-.407L5 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407V8.972l2.71 1.935A.5.5 0 0 0 12 10.5v-5a.5.5 0 0 0-.271-.445z"/>
              </svg>
          
        </a>
      
      </div>
      <?php if (count($videos)): ?>


      <?php else: ?>
          <div class="box-video-warning">
            
          <div class="alert alert-warning">
            <div class="icon__wrapper">
              <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
              </svg>
            </div>
            <p>Não existe videos cadastrados para essa categoria</p>
          </div>
          
        </div> 
      <?php endif; ?>

      <?php foreach($videos as $video): ?>
        <div class="box-video">
         <video>  <source src=<?= $video ?>  type="video/mp4"></video>
        </div>
      <?php endforeach; ?>
    
      <!-- <div class="box-video">
        <video controls>  <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4"  type="video/mp4"></video>
      </div> -->
    
    </main>
<script>

document.querySelectorAll('video').forEach(function(element) {

    element.addEventListener('click', function(e){
        e.target.webkitEnterFullscreen();
        console.log(e)
        setTimeout(function(){
        
            e.target.play()
        },1000)


        e.target.addEventListener(
            'ended',
            function myHandler(e){
                document.exitFullscreen()
            },
            false
        );
    
    })

})

// document.getElementsByTagName('video')[0].webkitEnterFullscreen();
// document.getElementsByTagName('video')[0].play();
</script>
</body>
</html>