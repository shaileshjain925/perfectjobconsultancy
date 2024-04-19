<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Blog Post: <?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        p {
            margin-bottom: 20px;
        }

        .blog-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .blog-content {
            margin-bottom: 20px;
        }

        .published-info {
            font-style: italic;
            color: #888;
            margin-bottom: 20px;
        }

        .featured-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .author-info {
            font-weight: bold;
        }

        .btn-container {
            text-align: center;
        }

        .visit-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .visit-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>New Blog Post: <?= $title ?></h2>
        <p class="published-info">Published on <?= $published_date ?></p>
        <?php if (!empty($featured_image)) : ?>
            <img src="<?= $featured_image ?>" alt="Featured Image" class="featured-image">
        <?php endif; ?>
        <div class="blog-content">
            <p class="blog-title"><?= $title ?></p>
            <p><?= $content ?></p>
        </div>
        <p class="author-info">Posted by <?= $uploder_name ?></p>
        <div class="btn-container">
        <a href="<?= @$website_url ?>/blogdetail?slug=<?= @$slug ?>" class="visit-btn">Visit Blog Page</a>
        </div>
    </div>
</body>

</html>
