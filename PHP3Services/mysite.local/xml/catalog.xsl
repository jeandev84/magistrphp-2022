<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output 
		method="html" 
		encoding="utf-8"
		indent="yes"/>

	<!-- 
	Шаблон корневого элемента
	-->
	<xsl:template match="/">
	 <xsl:text disable-output-escaping='yes'>&lt;!DOCTYPE html&gt;</xsl:text>
		<html>
			<head>
				<title>Наши книги</title>
				    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
			</head>
			<body>
				<h1>Наши книги</h1>
				<table class="table table-bordered table-hover">
					<thead>
						<td id="colTitle">Наименование</td>
						<td id="colAutor">Категория</td>
						<td id="colPubYear">Описание</td>
						<td id="colPrice">Автор</td>
						<td id="colPrice">Цена</td>
					</thead>
					<tbody>
						<xsl:apply-templates select="/catalog/book" />
					</tbody>
				</table>
			</body>
		</html>
	</xsl:template>
	<!--  
	Шаблон отрисовки книги стоимостью менее 200 руб.
	-->
	<xsl:template match="book[price &lt; 1000]">
		<tr>
			<xsl:apply-templates select="./*" />
		</tr>
	</xsl:template>
	<!-- 
	Шаблон отрисовки книги стоимостью более 200 руб.
	-->
	<xsl:template match="book[price &gt; 1000]">
		<tr class="table-active">
			<xsl:apply-templates select="./*" />
		</tr>
	</xsl:template>
	<!-- 
	Шаблон отрисовки дочерних элементов книги
	-->
	<xsl:template match="book/*">
		<td>
			<xsl:value-of select="." />
		</td>
	</xsl:template>
</xsl:stylesheet>