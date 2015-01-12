<?php
	error_reporting(E_ERROR | E_PARSE);

	class IssueTest extends CDbTestCase
	{

		public function testGetTypes()
		{
			$options = Issue::model()->typeOptions;
			$this->assertTrue(is_array($options));
			$this->assertTrue(3 == count($options));
			$this->assertTrue(in_array('Bug', $options));
			$this->assertTrue(in_array('Feature', $options));
			$this->assertTrue(in_array('Task', $options));
		}

		public function testGetStatus()
		{
			$options = Issue::model()->status;
			$this->assertTrue(is_array($options));
			$this->assertTrue(3 == count($options));
			$this->assertTrue(in_array('Not yet started', $options));
			$this->assertTrue(in_array('Started', $options));
			$this->assertTrue(in_array('Finished', $options));
		}

		public function testGetStatusText()
		{
			$issue = Issue::model()->findByPk(3);
			$this->assertTrue('Not yet started' == $issue ->getStatusText());
		}

		public function testGetTypeText()
		{

			$issue = Issue::model()->findByPk(3);
			$this->assertTrue('Feature' == $issue ->getTypeText());
		}

	}
