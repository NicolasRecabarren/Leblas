<style type="text/css">
    .page-header{
        height: 125px;
        text-align: center;
        /*background-image: url(/img/fondo_seleccion.jpg);*/
        background-color: #191A1C;
        margin: 0;
    }
    .page-header img{
        height: 115px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }
    .page-links{
        color: #FFF;
        font-weight: 700;
        font-size: 25px;
    }
    .sel-container{
        width: 550px;
        height: 350px;
    }
    p.title-img{
        color: #FFF;
        cursor: pointer;
        font-size: 25px;
        font-weight: 700;
        margin-bottom: 0;
        padding: 10px;
        text-align: center;
        width: 100%;
        position: absolute;
        top: 40%;
    }
    .back-img{
        position: absolute;
        top: 0;
        z-index: -2;
        background-size: cover;
        transition: all .3s ease;
    }
    .div-img{
        padding-right: 0;
        padding-left: 0;
        position: relative;
        overflow: hidden;
        border-radius: 15px;
    }
    .div-img .opacity{
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
        z-index: -1;
    }
    .div-img a{
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .opacity, .back-img {
        border-radius: 15px;
    }
    .back-img.hovered{
        transform: scale(1.2);
        border-radius: 15px;
    }
    @media screen and (min-width: 400px){
        .div-img, .back-img, ul li{
            width: 185px;
            height: 116px;
        }
    }
    @media screen and (min-width: 850px){
        .div-img, .back-img, ul li{
            width: 300px;
            height: 189px;
        }
    }
    @media screen and (min-width: 1000px){
        .div-img, .back-img, ul li{
            width: 360px;
            height: 226px;
        }
    }
    @media screen and (min-width: 1225px){
        .div-img, .back-img, ul li{
            width: 450px;
            height: 283px;
        }
    }
    @media screen and (min-width: 1480px){
        .div-img, .back-img, ul li{
            width: 550px;
            height: 350px;
        }
    }
    ul{
        list-style: none;
        padding: 0;
    }
    ul li{
        display: inline-block;
        position: absolute;
    }
</style>
<header class="page-header">
    <?=$this->Html->image('logo_seleccion.png',['style' => 'height: 115px;']);?>
</header>

<div class="row" style="padding-left: 40px;padding-right: 40px; margin: 40px 0;">
    <p style="text-align: center;padding: 10px 25%; font-size: 15px; font-weight: 600; margin-bottom: 50px;">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus adipiscing eget augue at tristique. Aliquam sit amet sodales dui, eget blandit metus. Nam fermentum purus eu est cursus tincidunt. Proin ut justo lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus adipiscing eget augue at tristique. Aliquam sit amet sodales dui, eget blandit metus. Nam fermentum purus eu est cursus tincidunt. Proin ut justo lorem.
    </p>
    <ul style="position: relative;">
        <li style="left: 10%;">
            <div class="div-img">
                <div class="opacity">&nbsp;</div>
                <?=$this->Html->image('seleccion_empresa.jpg',['class' => 'back-img']);?>
                <?=$this->Html->link(
                    '<p class="title-img">EMPRESAS</p>',
                    ['controller' => 'Pages','action' => 'home'],
                    ['escape' => false]
                );?>
            </div>
        </li>
        <li style="right: 10%;">
            <div class="div-img">
                <div class="opacity">&nbsp;</div>
                <?=$this->Html->image('thumb-1504739966-309633759.jpg',['class' => 'back-img']);?>
                <?=$this->Html->link(
                    '<p class="title-img">PERSONAS</p>',
                    ['controller' => 'Pages','action' => 'home'],
                    ['escape' => false]
                );?>
            </div>
        </li>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('mouseover','.div-img a, .div-img .opacity',function(){
            if(!$(this).siblings('.back-img').hasClass('hovered')){
                $(this).siblings('.back-img').addClass('hovered');
            }
        });
        
        $('body').on('mouseout','.div-img a, .div-img .opacity',function(){
            $(this).siblings('.back-img').removeClass('hovered');
        });
    });
</script>