<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lab 8 - Gửi Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 40px;
        }

        .container {
            max-width: 550px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #ddd;
        }

        h2 {
            color: #2563eb;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>GỬI EMAIL - LAB 8</h2>

    <form action="mail.php"
          method="POST"
          enctype="multipart/form-data">

        <label>Email người nhận</label>
        <input type="email" name="email" required>

        <label>Tiêu đề</label>
        <input type="text" name="tieude" required>

        <label>Nội dung</label>
        <textarea name="content" rows="6"
                  required></textarea>

        <label>File đính kèm</label>
        <input type="file" name="file">

        <button type="submit">Gửi Email</button>
    </form>
</div>

</body>
</html>
