<?=$this->extend('anfitrion/main')?>

<?=$this->section('title')?>
Inicio Anfitrion
<?=$this->endSection()?>

<?=$this->section('css')?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css
">
<?=$this->endSection()?>

<?=$this->section('content')?>

<section class='section'>
    <div class='container'>
        <?php if(session('msg')):?>
        <article class="message is-<?=session('msg.type')?>">
            <div class="message-body">
                <?=session('msg.body')?>
            </div>
        </article>
        <?php endif; ?>

        <?php if(session()->is_logged): ?>
        <h5>Estoy en inicio, soy <?=session('rol')?></h5>
        <?php else: ?>
        <h5>Es el incio</h5>
        <?php endif; ?>
    </div>
</section>
<?=$this->endSection()?>