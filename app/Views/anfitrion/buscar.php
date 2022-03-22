<?=$this->extend('anfitrion/main')?>

<?=$this->section('title')?>
Buscar Anfitrion
<?=$this->endSection()?>

<?=$this->section('css')?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css
">
<?=$this->endSection()?>

<?=$this->section('content')?>

<section class='section'>
    <div class='container'>
        <?php if(session('msg')):?>
        <?php if(session('msg')):?>
        <article class="message is-<?=session('msg.type')?>">
            <div class="message-body">
                <?=session('msg.body')?>
            </div>
        </article>
        <?php endif; ?>
        <?php endif; ?>

        <h5>Estoy en buscar, soy <?=session('rol')?></h5>
    </div>
</section>

<?=$this->endSection()?>