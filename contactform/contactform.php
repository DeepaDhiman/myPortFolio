<?php
    // $db = pg_connect("host=ec2-79-125-4-72.eu-west-1.compute.amazonaws.com port=5432 dbname=dcuoqso0dff69g user=idnvsgjudopxup password=ae6271b8e68779c603d64f5915ac764992785969b7e6f059e21645b713bd45a1");
    $db = parse_url(getenv("DATABASE_URL") ?: "postgres://idnvsgjudopxup:ae6271b8e68779c603d64f5915ac764992785969b7e6f059e21645b713bd45a1@ec2-79-125-4-72.eu-west-1.compute.amazonaws.com:5432/dcuoqso0dff69g");
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;sslmode=require;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
    if(!$db){
      echo "Error : Unable to open database\n";
      } else {
      echo "Opened database successfully\n";
    }
    $statement = $pdo->prepare('INSERT INTO reviews (name, email, subject, comment)
    VALUES (:name, :email, :subject, :comment)');

    $statement->execute([
        'name' => 'Bob',
        'email' => 'bob@gmail.com',
        'subject' => 'testing',
        'comment' => 'Hii'
    ]);

    $statement = $pdo->prepare('INSERT INTO testtable (name, email, subject, comment) VALUES (?, ?, ?, ?)');

    $statement->execute(['Bob1', 'bob1@gmail.com', 'testing1', 'Hii1']);
?>