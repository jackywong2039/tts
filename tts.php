<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text to Speech Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        textarea {
            width: 95%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>    
</head>

<body>
    <h1>Text to Speech Converter</h1>
    <form action="output.php" method="post">
        <select name="lang" id="lang">
            <option value="yue">粵語</option>
            <option value="en">英文</option>
            <option value="ja">日文</option>
            <option value="ko">韓文</option>
        </select>
        <textarea name="txt" rows="4" placeholder="Enter text..."></textarea>
        <select name="lang2" id="lang2">
            <option value="yue">粵語</option>
            <option value="en">英文</option>
            <option value="ja">日文</option>
            <option value="ko">韓文</option>
        </select>
        <input type="submit" value="Convert">
    </form>
</body>

</html>