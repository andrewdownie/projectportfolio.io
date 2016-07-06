create TABLE blog_head
    (
        blog INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        project INT,
        name VARCHAR(80),
        url_name VARCHAR(80),
        created INT
    );
