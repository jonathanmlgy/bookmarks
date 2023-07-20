<!DOCTYPE html>
<html>
<head>
      <title>Bookmark</title>
</head>
<body>
    <h1>Are you sure you want to delete</h1>
    <p><?=$to_destroy['folder']?>/<?=$to_destroy['name']?> (<?=$to_destroy['url']?>)</p>
    <p><?=$id?></p>
    <a href="/bookmarks/show">No</a>
    <a href="/bookmarks/delete/<?=$id?>">Yes, I want to delete</a>
</body>
</html>
