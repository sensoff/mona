
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Мебель 100</title>

	<meta property="description" content="<?php echo $this->description; ?>">
	<meta property="og:description" content="<?php echo $this->description; ?>">

	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/reset.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/common.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css//nivo-slider.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/js/components/fotorama/fotorama.css" type="text/css" media="screen, projection">
  <script data-main="<?php echo Yii::app()->baseUrl?>/js/required.js" src="<?php echo Yii::app()->baseUrl?>/js/components/requirejs/require.js"></script>
</head>
<body>
  <div class="page">
    <div class="wrap">
      <div class="wrapper-header-top">
        <div class="header-top">
          <?php echo $this->slogan ?>
        </div>
      </div>
      <div class="wrapper-header">
        <div class="header">
          <div class="logo">
            <a href="<?php echo Yii::app()->baseUrl?>/">
              <img src="<?php echo Yii::app()->baseUrl?>/images/logo.png" alt="Логотип Мебель 100" title="На главную" />
            </a>
          </div>
          <div class="right">
            <div class="email">
              <div class="text">
                 <?php echo $this->email ?>
              </div>
              <div class="logot"></div>
            </div>
            <div class="phone">
              <div class="text2">
                <?php echo $this->phone ?>
              </div>
              <div class="logot"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="wrapper">
      	<?php echo $content;?>
      </div>


    </div>
  </div>
  <div class="footer_wrapper">
    <div class="footer">
      <div class="about">
        <?php echo $this->firm ?><br />
        <span>УНП <?php echo $this->ynp ?></span>
      </div>
      <div class="social">
        <span>Присоединяйтель к обсуждениям:</span>
        <a class="vk" href="<?php echo $this->vk ?>" target="_blank"></a>
        <a class="fb" href="<?php echo $this->fb ?>" target="_blank"></a>
        <a class="inst" href="<?php echo $this->instagram ?>" target="_blank"></a>
        <a class="odn" href="<?php echo $this->odn ?>" target="_blank"></a>
      </div>
    </div>
  </div>
</body>
</html>
