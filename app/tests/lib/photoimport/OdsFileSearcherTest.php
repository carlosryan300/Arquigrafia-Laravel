<?php namespace lib\photoimport;

use Mockery as m;
use File;
use App;
use \TestCase;

function file_exists($file) {
  if ($file == 'file_log_exists.log') {
    return true;
  }
  return false;
}

class OdsFileSearcherTest extends TestCase {

  protected $searcher;

  public function tearDown()
  {
    m::close();
  }

  public function setUp()
  {
    parent::setUp();
    $this->searcher = App::make('lib\photoimport\OdsFileSearcher');
  }

  public function testGetAllFiles() {
    $file = 'file';
    $allFiles = 'allFiles';
    File::shouldReceive('allFiles')->with($file)->andReturn($allFiles);
    $return = $this->searcher->getAllFiles($file);
    
    $this->assertEquals($allFiles, $return);
  }

  public function testSearchReturnsAllValidOdsFiles() {
    $searcher = m::mock('lib\photoimport\OdsFileSearcher[getAllFiles]');
    $root = m::mock('odsFilesRootPath');

    $file1 = m::mock('odsFile');
    $file1->shouldReceive('isFile')->once()->andReturn(true);
    $file1->shouldReceive('getExtension')->once()->andReturn('ods');
    $file1->shouldReceive('getPathname')->once()->andReturn('file_log_doesnt_exist');

    $file2 = m::mock('odsFile');
    $file2->shouldReceive('isFile')->once()->andReturn(true);
    $file2->shouldReceive('getExtension')->once()->andReturn('ods');
    $file2->shouldReceive('getPathname')->once()->andReturn('file_log_exists');

    $files = array( $file1, $file2 );

    $searcher->shouldReceive('getAllFiles')->with($root)->andReturn($files);
    $return = $searcher->search($root);

    $this->assertEquals( array($file1), $return );
  }
}
