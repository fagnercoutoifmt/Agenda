<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Tudo sobre o google glass</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="_css/media.css" />
    </head>
    <body>
        <div id="interface">
            <header id="cabecalho">
                 <?php include('./Cabecalho.html'); ?>      
            </header>
            
            <article id="artigoPrincipal">
                <header id="cabecalhoArtigo">
                    <hgroup>
                        <h1>Glass > Multimídia</h1>
                        <h2>Sons e Vídeos</h2>
                    </hgroup>
                </header>

                <div id="tvRadio">
                    <audio id="musica" controls="controls">
                        <source src="_media/2009-lovers-carvings-bibio.mp3" type="audio/mpeg" />
                        Desculpe, mas não foi possível carregar o áudio!
                    </audio>
                    <video id="filme" controls="controls" poster="_imagens/video-mini03.jpg">
                        <source src="_media/getting-started.mp4" type="video/mp4" />
                        Desculpe, mas não foi possível carregar o vídeo!
                    </video>
                </div>
            </article>
            <footer id="rodape">
                <?php include('./Rodape.html'); ?>      
            </footer>
        </div>
    </body>
</html>