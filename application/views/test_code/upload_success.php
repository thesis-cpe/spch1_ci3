<html>
    <head>
        <title>Upload Form</title>
    </head>
    <body>

        <h3>Your file was successfully uploaded!</h3>


        <ul>
            <?php foreach ($upload_data as $item => $value): ?>
                <li><?php echo $item; ?>: <?php echo $value; ?></li>
            <?php endforeach; ?>  
        </ul>

        <ul>
            <?php
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            echo $file_name = $upload_data['file_name']; //credit http://stackoverflow.com/questions/16345761/codeigniter-get-the-uploaded-file-name
            ?>
        </ul>


    </body>
</html>