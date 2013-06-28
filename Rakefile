#
# tasks for deploying and migrating databases
#
ssh_user           = ""
remote_root        = "" #path to your WordPress installation
remote_theme       = ""  #Path to your theme directory
remote_plugins     = "" # Path to your plugins directory
remote_mu          = "" # Path to your MU plugins directory if you're using it
remote_vhost       = "staengl.engine-earring.com" # example.com
remote_db_user     = "staenglengineear"
remote_db_password = "iK74^xmH"
remote_db_name     = "staengl_engine_earring_c"
remote_db_host     = "mysql.staengl.engine-earring.com"
remote_prefix      = 'wp\_gxiyhv\_'  # wp_ - must be escaped for sed

local_vhost       = "staengl.dev"
local_db_user     = "wp"
local_db_password = "meeS00"
local_db_name     = "staengl"
local_db_host     = "127.0.0.1"
local_prefix      = 'wp\_'  # wp_ - must be escaped for sed

local_root        = ""
local_theme       = ""
local_plugins     = ""
local_mu          = ""

namespace :db do

  desc "Pull DB"
  task :pull do
    Dir.mkdir("tmp") unless Dir.exists?("tmp")
    [
      "mysqldump --add-drop-table  -h #{remote_db_host} -u #{remote_db_user} -p#{remote_db_password} #{remote_db_name} > tmp/remote_dump.sql",
      'sed -i bk1 "' + "s/www.#{remote_vhost}/#{local_vhost}/g" + '" tmp/remote_dump.sql',
      'sed -i bk2 "' + "s/#{remote_vhost}/#{local_vhost}/g" + '" tmp/remote_dump.sql',
      'sed -i bk3 "' + "s/#{remote_prefix}/#{local_prefix}/g" + '" tmp/remote_dump.sql',
      "mysql -h #{local_db_host} -u #{local_db_user} -p#{local_db_password} #{local_db_name}  < tmp/remote_dump.sql"
    ].each do |cmd|
      puts cmd
      system cmd
    end
  end

  desc "Push DB"
  task :push do
    Dir.mkdir("tmp") unless Dir.exists?("tmp")
    [
      "mysqldump --add-drop-table  -h #{local_db_host} -u #{local_db_user} -p#{local_db_password} #{local_db_name} > tmp/local_dump.sql",
      'sed -i bk1 "' + "s/www.#{local_vhost}/#{remote_vhost}/g" + '" tmp/local_dump.sql',
      'sed -i bk2 "' + "s/#{local_vhost}/#{remote_vhost}/g" + '" tmp/local_dump.sql',
      'sed -i bk3 "' + "s/#{local_prefix}/#{remote_prefix}/g" + '" tmp/local_dump.sql',
      "mysql -h #{remote_db_host} -u #{remote_db_user} -p#{remote_db_password} #{remote_db_name}  < tmp/local_dump.sql"
    ].each do |cmd|
      puts cmd
      system cmd
    end
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