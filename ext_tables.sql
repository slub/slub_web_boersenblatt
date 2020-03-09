#
# Modifying tt_content table
#

CREATE TABLE tt_content (
	ce_feature_item int(11) unsigned DEFAULT '0'
);

#
# Table structure for table 'ce_feature_item'
#
CREATE TABLE ce_feature_item (
	tt_content int(11) unsigned DEFAULT '0',

	bodytext text,
	header varchar(255) DEFAULT '' NOT NULL,
	image int(11) DEFAULT '0' NOT NULL,
	link varchar(255) DEFAULT '' NOT NULL,
	linktext varchar(255) DEFAULT '' NOT NULL
);
