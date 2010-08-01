<?php
/* Movie Fixture generated on: 2010-08-02 00:08:05 : 1280673965 */
class MovieFixture extends CakeTestFixture {
	var $name = 'Movie';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'genre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'rating' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'format' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'length' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => '4c5588ad-7e24-463e-9ba3-e7e008088fed',
			'title' => 'Lorem ipsum dolor sit amet',
			'genre' => 'Lorem ipsum dolor sit amet',
			'rating' => 'Lorem ipsum dolor sit amet',
			'format' => 'Lorem ipsum dolor sit amet',
			'length' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-08-02 00:46:05',
			'modified' => '2010-08-02 00:46:05'
		),
	);
}
?>