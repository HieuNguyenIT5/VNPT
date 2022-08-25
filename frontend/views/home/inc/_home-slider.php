<?php
use yii\helpers\html;
?>
<div id="slider" class="section-detail box-shadow">
    <div class="item">
      <?= Html::img('uploads/slider/slider-01.png');?>
    </div>
    <div class="item">
    <?= Html::img('uploads/slider/slider-02.png');?>

    </div>
    <div class="item">
    <?= Html::img('uploads/slider/slider-03.png');?>

    </div>
</div>
<script type="module">
  $(document).ready(function () {
//  SLIDER
    var slider = $('.section-detail');
    slider.owlCarousel({
        autoPlay: 4500,
        navigation: false,
        navigationText: false,
        paginationNumbers: false,
        pagination: true,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1000, 1], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 1], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });
  })
  const{ createSilder } = Vue 
  createSilder({
  }).mount('#slider')
</script>
<style>
  .item img{
    width:100%;
    height: 400px;
    object-fit: cover;
  }
</style>