<?php require "partials/header.php" ?>

<?php require "partials/nav.php" ?>

<?php require "partials/banner.php" ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= $note['text'] ?></p>
    </div>
    <div><a href="/notes" class='text-blue-500 hover:underline'>Back to My Notes page.</a></div>
</main>

<?php require "partials/footer.php" ?>