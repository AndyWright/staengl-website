#
# tasks for deploying and migrating databases
#
ssh_user          = ""
remote_root       = "" #path to your WordPress installation
remote_theme       = ""  #Path to your theme directory
remote_plugins       = "" # Path to your plugins directory
remote_mu       = "" # Path to your MU plugins directory if you're using it
remote_vhost             = "" # example.com
remote_db_user     = ""
remote_db_password = ""
remote_db_name     = ""
remote_db_host     = ""

local_db_user     = ""
local_db_password = ""
local_db_name     = ""
local_db_host     = ""
local_vhost             = ""
local_root       = ""
local_theme       = ""
local_plugins       = ""
local_mu       = ""

namespace :db do
  desc "Pull DB"
  task :pull do
    #TODO check if the directory exists
    Dir.mkdir("tmp")
    system( "mysqldump --add-drop-table  -h #{remote_db_host} -u #{remote_db_user} -p#{remote_db_password} #{remote_db_name} > tmp/dump.sql")
    system 'sed -i "s/www.#{remote_vhost}/#{local_vhost}/g" tmp/dump.sql'
    system 'sed -i "s/#{remote_vhost}/#{local_vhost}/g" tmp/dump.sql'
    system "mysql -h #{local_db_host} -u #{local_db_user} -p#{local_db_password} #{local_db_name}  < tmp/dump.sql"
    Dir.delete("tmp")
  end
  desc "Push DB"
  task :push do
    Dir.mkdir("tmp")
    system "mysqldump --add-drop-table  -h #{local_db_host} -u #{local_db_user} -p#{local_db_password} #{local_db_name} > tmp/dump.sql"
    system 'sed -i "s/www.#{local_vhost}/#{remote_vhost}/g" tmp/dump.sql'
    system 'sed -i "s/#{local_vhost}/#{remote_vhost}/g" tmp/dump.sql'
    system "mysql -h #{remote_db_host} -u #{remote_db_user} -p#{remote_db_password} #{remote_db_name}  < tmp/dump.sql"
    Dir.delete("tmp")
  end
end

namespace :uploads do
  desc "Pull Uploads"
  task :pull do
    system( "rsync -avz  #{ssh_user}:#{remote_root}/wp-content/uploads/  #{local_root}/wp-content/uploads/")
  end
  desc "Push Uploads"
  task :push do
    system( "rsync -avz  #{local_root}/wp-content/uploads/ #{ssh_user}:#{remote_root}/wp-content/uploads/ ")
  end
end

namespace :theme do
  desc "Pull Theme"
  task :pull do
    system( "rsync -avz  #{ssh_user}:#{remote_theme}/  #{local_theme}/")
  end
  desc "Push Theme"
  task :push do
    system( "rsync -avz  --exclude-from 'exclude.txt' --delete #{local_theme}/ #{ssh_user}:#{remote_theme}/")
  end
end

namespace :plugins do
  desc "Push Plugins"
  task :push do
    system( "rsync -avz #{local_plugins}/ #{ssh_user}:#{remote_plugins}/")
  end
  desc "Pull Plugins"
  task :pull do
    system( "rsync -avz #{ssh_user}:#{remote_plugins}/ #{local_plugins}/")
  end
end

namespace :mu do
  desc "Push MU Plugin"
  task :push do
    system( "rsync -avz  --exclude-from 'exclude.txt' --delete #{local_mu}/ #{ssh_user}:#{remote_mu}/")
  end
end