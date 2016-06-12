<?xml version="1.0" encoding="utf-8"?><!-- DWXMLSource="berita/kereta.xml" --><!DOCTYPE xsl:stylesheet  [
	<!ENTITY nbsp   "&#160;">
	<!ENTITY copy   "&#169;">
	<!ENTITY reg    "&#174;">
	<!ENTITY trade  "&#8482;">
	<!ENTITY mdash  "&#8212;">
	<!ENTITY ldquo  "&#8220;">
	<!ENTITY rdquo  "&#8221;"> 
	<!ENTITY pound  "&#163;">
	<!ENTITY yen    "&#165;">
	<!ENTITY euro   "&#8364;">
]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" encoding="utf-8"/>
<xsl:template match="/"><style type="text/css">
<xsl:comment>
</xsl:comment>
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td><p><strong><xsl:value-of select="rss/channel/title"/></strong></p>
      <p>&nbsp;</p></td>
  </tr>
  <xsl:for-each select="rss/channel/item">
    <tr>
      <td><p><strong><a href="{link}"><xsl:value-of select="title"/></a></strong></p>
          <p><xsl:value-of select="description" disable-output-escaping="yes"/></p>
        <p><a href="{string(link)}"><xsl:value-of select="link"/></a></p></td>
    </tr>
  </xsl:for-each>
</table>
</xsl:template>
</xsl:stylesheet>