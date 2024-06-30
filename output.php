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

        .audio-container {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        audio {
            width: 100%;
        }

        .text-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .text-container textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            resize: none;
        }

        .button-container {
            text-align: center;
            margin-top: 10px;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        table {
            width: 50%;
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
    </style>
</head>

<body>
    <h1>Text to Speech Converter</h1>
    <div class="audio-container">
        <?php
        $file = 'sound2.mp3';

        if (file_exists($file)) {
            if (unlink($file)) {
            } else {
            }
        } else {
        }

        if (isset($_POST['txt'])) {
            $ttt = $_POST['txt'];
            $ttt = htmlspecialchars($ttt);
            $ttt = rawurlencode($ttt);
            $lang = $_POST['lang'];
            $lang2 = $_POST['lang2'];
            file_put_contents('sound.mp3', file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $ttt . '&tl=' . $lang), LOCK_EX);
        }
        ?>
        <table>
            <tr>
                <td>
                    <form action="output.php" method="post">

                        <div class="text-container">
                            <textarea name="txt" rows="6"
                                readonly><?php echo isset($_POST['txt']) ? $_POST['txt'] : ''; ?></textarea>
                        </div>
                </td>
            </tr>
            <tr>
                <td>
                    <audio controls>
                        <source src="sound.mp3" type="audio/mp3">
                    </audio><br />
                    <script>
                        const ttt = <?php echo json_encode($ttt); ?>;
                        const lang = <?php echo json_encode($lang); ?>;
                        const lang2 = <?php echo json_encode($lang2); ?>;

                        const translateText = async () => {
                            const res = await fetch(`https://api.mymemory.translated.net/get?q=${ttt}&langpair=${lang}|${lang2}`);
                            const data = await res.json();
                            const translatedText = data.responseData.translatedText;

                            const toText = document.querySelector('.toText');
                            toText.value = translatedText;
                        };

                        translateText();
                    </script>
                    <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                    <input type="hidden" name="lang2" value="<?php echo $lang2; ?>">
                    <textarea class="toText" id="toText" name="toText"></textarea>
                    <button type="submit" id="submitButton">submit</button>
                    </form>
                    <script>
                    </script>
                    <?php
                    if (isset($_POST['toText'])) {
                        $toText = $_POST['toText'];
                        $toText = htmlspecialchars($toText);
                        $toText = rawurlencode($toText);
                        file_put_contents('sound2.mp3', file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $toText . '&tl=' . $lang2), LOCK_EX);
                    }
                    ?>
                    <audio controls>
                        <source src="sound2.mp3" type="audio/mp3">
                    </audio>
                </td>
            </tr>
        </table>
    </div>
    <div class="button-container">
        <button class="back-button" onclick="window.location.href='tts.php'">Back</button>
    </div>
</body>

</html>