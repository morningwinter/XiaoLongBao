<div class="well well-half">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-8">
      <h3><?php echo $video['title']; ?></h3>
      <a href="<?php echo base_url(); ?>/audios/<?php echo $video['audio_name']; ?>"
        style="display:block;width:425px;height:300px;"
        id="player">
      </a>

      <script language="JavaScript">
      flowplayer("player", "<?php echo base_url(); ?>/assets/plugin/flowplayer/flowplayer-3.2.18.swf", {
          clip: {
              autoPlay: false,
              autoBuffering: true
          }
      });
      </script>
      <h4><?php echo $video['speaker']." | ".$video['date']; ?></h4>
    </div>
  </div>
</div>