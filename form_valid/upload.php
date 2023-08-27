<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <pre>
    <?php
    $errorMessage = ""; 
    $successMessage = "";
    
    if(isset($_POST['submit']))
    {   
        var_dump($_FILES['file']);
        if (!empty($_FILES['file'])) {
            $file = $_FILES['file'];
            $filename = $file['name'];
            $filesize = $file['size'];
            $filetmp = $file['tmp_name'];
            $filetype = $file['type'];

            // Check size
            if ($filesize > 8440000) {
                $errorMessage = "Size too large.";
            } else {
                $uploadDir = 'uploads/';
                $uploadPath = $uploadDir . $filename;

                // Increment counter if file exists
                $counter = 1;
                while (file_exists($uploadPath)) {
                    $filename = '(' . $counter . ')' . $file['name'];
                    $uploadPath = $uploadDir . $filename;
                    $counter++;
                }

                // Validate file type
                if (file_exists($filetmp)) {
                    $error = isValidFile($filetmp);
                    if ($error === false) {
                        move_uploaded_file($filetmp, $uploadPath);
                        $successMessage = "File uploaded successfully!";
                    } else {
                        $errorMessage = $error;
                    }
                } else {
                    $errorMessage = "Error: The file does not exist.";
                }
            }
        }
    }
    
    function isValidFile($filetmp) {
        $allowedTypes = ['image/jpeg', 'image/gif'];
        $type = mime_content_type($filetmp);

        if (in_array($type, $allowedTypes)) {
            return false;
        }
        
        return 'Error: Only ' . implode(', ', $allowedTypes) . ' are allowed';
    }
    ?>
    </pre>
    <h2>File Upload Form</h2>
   
    <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload" name="submit">
        
        <?php if (!empty($successMessage)) : ?>
            <div class="success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($errorMessage)) : ?>
            <div class="error">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>