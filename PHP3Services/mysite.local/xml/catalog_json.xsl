<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output 
		method="text" 
		encoding="utf-8"
		indent="yes"/>

	<!-- 
	Шаблон корневого элемента
	-->
	<xsl:template match="/">
		<xsl:apply-templates select="/catalog/book" />
	</xsl:template>
	<!--  
	Шаблон отрисовки книги
	-->
	<xsl:template match="book">
		{\rtf1
			<xsl:apply-templates select="./*" />
		}
	</xsl:template>

	<!-- 
	Шаблон отрисовки дочерних элементов книги
	-->
	<xsl:template match="book/title">
				{"title": "<xsl:value-of select="." />",
	</xsl:template>
	<xsl:template match="book/category">
				"category": "<xsl:value-of select="." />",
	</xsl:template>
	<xsl:template match="book/description">
				"description": "<xsl:value-of select="." />",
	</xsl:template>
	<xsl:template match="book/author">
				"author": "<xsl:value-of select="." />",
	</xsl:template>
	<xsl:template match="book/price">
				"price": "<xsl:value-of select="." />"}
	</xsl:template>
</xsl:stylesheet>