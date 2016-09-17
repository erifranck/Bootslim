import gulp from 'gulp';
import plugins from 'gulp-load-plugins';
import fs from 'fs';

const tasksPath = './tasks/';
const taskList = fs.readdirSync(tasksPath);
const onError = function(err) {
  console.log(err);
  this.end();
};

taskList.forEach((tasksFile) =>{
  require(tasksPath + tasksFile)(gulp, plugins(), onError);
});
