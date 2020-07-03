<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    exclude-result-prefixes="xs"
    version="2.0">
    <xsl:output method="html"/> 
    <xsl:template match="/">
        <html>
            <head>
                <meta charset="utf-8"/>
                <title>
                    <xsl:value-of select="descendant::title"/>
                </title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
                <style>
                    body{
                    background:url("Img/background.jpg");
                    margin-left:200px;
                    margin-right:200px;
                    background-size:cover;
                    }  
                </style>
            </head>
            <body>
                <u><h1 align="center"><xsl:value-of select="book/title"/></h1></u>
                <h3 align="center">by <xsl:value-of select="descendant::writer"/></h3>
                <i><b><xsl:value-of select="descendant::about_the_Book"/></b></i><br/>
                <xsl:for-each select="book/pages/page/content/paragraph">
                    <p><xsl:value-of select="."/></p>
                </xsl:for-each>
                <h5 align="center" ><xsl:value-of select="descendant::comment"/></h5><br/>
                <h5 align="center" >Evaluation : <xsl:value-of select="descendant::evaluation"/></h5>
            </body>
        </html>
    </xsl:template> 
</xsl:stylesheet>