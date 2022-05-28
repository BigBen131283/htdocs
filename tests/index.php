<html>
    <head>
        <meta <?php /*Code PHP*/ ?> charset="utf-8"/>
        <title>Ceci est une page HTML de test <?php /*Code PHP*/ ?></title>
    </head>

    <body>
        <h2>Page de test</h2>
        <p>
            Cette page contient du code HTML avec des balises PHP.<br/>
            <?php /*Insérer du code PHP ici */?>
            <?php 
                echo "ceci est du texte<br/>";
            ?>
            <?php 
                print ("ceci est du <strong>texte</strong><br/>");/*ou bien avec des parenthèses*/ 
            ?>
            Voici quelques petits tests :
<!-- 
echo et print font la même chose, echo est plus utilisée
point virgule pour terminer l'instruction
guillemets pour délimiter une chaîne de caractères
on peut demander l'affichage des balises (exemple strong)
pour afficher des guillemets on utilise \" le mot entre guillemets\"
-->

        </p>

        <ul>
            <li style="color: blue;">Texte en bleu</li>
            <li style="color: red;">Texte en rouge</li>
            <li style="color: green;">Texte en vert</li>
        </ul>
        <?php
        /* Encore du PHP
        Toujours du PHP */
        ?>

        <h2>Affichage de texte avec PHP</h2>
        
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo("Celle-ci a été écrite entièrement en PHP."); ?>
        </p>

        <h1>Ma page web</h1>
        <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?></p>

        <?php
            include './mySQL.php'
        ?>
    </body>
</html>