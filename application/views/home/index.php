<style>
    .hoverlink
    {
        color: #ffffff;
        text-decoration: none;
    }
    .hoverlink:hover
    {
        color: lightblue;
    }
</style>
<?php
    if($this->session->flashdata('flash-data'))
    {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?=$this->session->flashdata('flash-data');?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php
    }
?>
<div id="sliding" class="carousel slide" data-interval="2000" data-ride="carousel">
  <div class="carousel-inner">
        <div class="carousel-item active" style="background: url(<?= base_url();?>image/pubg.jpg); background-size: cover; min-height:92vh;">        
        </div>
        <div class="carousel-item" style="background: url(<?= base_url();?>image/weapon1.jpg); background-size: cover; min-height:92vh;">      
        </div>
        <div class="carousel-item" style="background: url(<?= base_url();?>image/Steam.jpg); background-size: cover; min-height:92vh;"> 
        </div>
        <div class="carousel-item" style="background: url(<?= base_url();?>image/jug.jpg); background-size: cover; min-height:92vh;"> 
        </div>
    <div>
</div>
    <div class="row"> <!---->
        <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 85vh;">
            <a href="<?= base_url();?>katalog" class="navbar-brand hoverlink" style="font-size: 60px;border-radius: 25px; padding: 10px; background-color: rgba(10,90,20,0.98)">    
                Lets Go Shoping !
            </a>
        </div>        
    </div>
  </div>
</div>    
</div>