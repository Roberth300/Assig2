<?php
include 'db.php';
include 'header.php';

$stmt = $pdo->query('SELECT * FROM posts');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="mb-4">Published Information</h1>

<?php foreach ($posts as $post): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            <img src="uploads/<?php echo htmlspecialchars($post['image']); ?>" alt="Imagen" class="img-fluid">
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                <a href="update.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Update</a>
                <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">DELETE</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'footer.php'; ?>
