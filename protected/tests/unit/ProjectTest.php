<?php
error_reporting(E_ERROR | E_PARSE);
class ProjectTest extends CDbTestCase
{

	public function testCRUD()
	{
   		//Create a new project
   		$newProject=new Project;
 		$newProjectName = 'Test Project 1';
 		
 		$newProjectName = 'Test Project Creation';
        $newProject->setAttributes(array(
           'name' => $newProjectName,
            'description' => 'This is a test for new project creation',
        ));
		$this->assertTrue($newProject->save(false));

		//READ back the newly created project
		$retrievedProject=Project::model()->findByPk($newProject->id);
		$this->assertTrue($retrievedProject instanceof Project);
		$this->assertEquals($newProjectName,$retrievedProject->name);
		

		$this->assertEquals(Yii::app()->user->id, $retrievedProject->create_user_id);

		//UPDATE the newly created project
	    $updatedProjectName = 'Updated Test Project 1';
	    $newProject->name = $updatedProjectName; 
	    $this->assertTrue($newProject->save(false));

	    //read back the record again to ensure the update worked
		$updatedProject=Project::model()->findByPk($newProject->id);
		$this->assertTrue($updatedProject instanceof Project);
		$this->assertEquals($updatedProjectName,$updatedProject->name);

		//DELETE the project
		$newProjectId = $newProject->id;
		$this->assertTrue($newProject->delete());
		$deletedProject=Project::model()->findByPk($newProjectId);
		$this->assertEquals(NULL,$deletedProject);
	}

	public function testGetUserOptions()
	{
		$project = Project::model()->findByPk(3);
		$options = $project->userOptions;
		$this->assertTrue(is_array($options));
		$this->assertTrue(count($options) > 0);
	}

	public function testUserRoleAssignment()
	{
		$project = Project::model()->findByPk(3);
		$user = User::model()->findByPk(1);
		$this->assertEquals(1,$project->associateUserToRole('owner',$user->id));
		$this->assertEquals(1,$project->removeUserFromRole('owner',$user->id));
	}

	public function testIsInRole()
	{
		$project = Project::model()->findByPk(3);
		$user = User::model()->findByPk(1);
		Yii::app()->user->setId($user->id);
		$this->assertTrue($project->isUserInRole('member'));
	}

	public function testGetUserRoleOptions()
	{
		$options = Project::getUserRoleOptions();
		$this->assertEquals(count($options),3);
		$this->assertTrue(isset($options['reader']));
		$this->assertTrue(isset($options['member']));
		$this->assertTrue(isset($options['owner']));
	}

	public function testUserProjectAssignment()
	{
		//since our fixture data already has the two users assigned to project 1, we'll assign user 1 to project 2
		//$this->projects('project2')->associateUserToProject($this->users('user1'));
		//$this->assertTrue($this->projects('project1')->isUserInProject($this->users('user1')));

	}

}