#
# tasks for deploying and migrating databases
#

# jimnist
# ssh_alias          = "jimnist"  # jimnist is
# remote_root        = "/home/jimnist/staengl.engine-earring.com" #path to your WordPress installation
# remote_theme       = File.join "#{remote_root}", "wp-content/themes/staengl-website"  #Path to your theme directory
# remote_plugins     = "" # Path to your plugins directory
# remote_mu          = "" # Path to your MU plugins directory if you're using it
# remote_vhost       = "staengl.engine-earring.com" # example.com
# remote_db_user     = "staenglengineear"
# remote_db_password = "iK74^xmH"
# remote_db_name     = "staengl_engine_earring_c"
# remote_db_host     = "mysql.staengl.engine-earring.com"
# remote_prefix      = 'wp\_gxiyhv\_'  # wp_gxiyhv_ - escaped for sed

# beta
# ssh_alias          = "staengl"
# remote_root        = "/home/galsta1/staenglengineering.com" #path to your WordPress installation
# remote_theme       = File.join "#{remote_root}", "wp-content/themes/staengl-website"  #Path to your theme directory
# remote_plugins     = "/home/galsta1/staenglengineering.com/wp-content/plugins" # Path to your plugins directory
# remote_mu          = "" # Path to your MU plugins directory if you're using it
# remote_vhost       = "staenglengineering.com" # example.com
# remote_db_user     = "staengladmin"
# remote_db_password = "aDBy8vYk"
# remote_db_name     = "beta_staenglengineering_"
# remote_db_host     = "mysql.beta.staenglengineering.com"
# remote_prefix      = 'wp\_7xmfjj\_'  # wp_7xmfjj_  - escaped for sed

# production
ssh_alias          = "staengl"
remote_root        = "/home/galsta1/staenglengineering.com" #path to your WordPress installation
remote_theme       = File.join "#{remote_root}", "wp-content/themes/staengl-website"  #Path to your theme directory
remote_plugins     = "/home/galsta1/staenglengineering.com/wp-content/plugins" # Path to your plugins directory
remote_mu          = "" # Path to your MU plugins directory if you're using it
remote_vhost       = "staenglengineering.com" # example.com
remote_db_user     = "staengladmin"
remote_db_password = "m0rningw00d"
remote_db_name     = "beta_staenglengineering_"
remote_db_host     = "mysql.beta.staenglengineering.com"
remote_prefix      = 'wp\_7xmfjj\_'  # wp_7xmfjj_  - escaped for sed


local_vhost       = "staengl.dev"
local_db_user     = "wp"
local_db_password = "meeS00"
local_db_name     = "staengl"
local_db_host     = "127.0.0.1"
local_prefix      = 'wp\_'  # wp_ - escaped for sed

local_root        = "/Users/jimnist/wrk/staengl/staengl-website"
local_wp        = "/Users/jimnist/wrk/staengl/wordpress"
local_theme       = local_root
local_plugins     = ""
local_mu          = ""

namespace :theme do
  desc "Pull Theme"
  task :pull do
    cmd = "rsync -avz  #{ssh_alias}:#{remote_theme}/  #{local_theme}/"
    puts cmd
    system cmd
  end

  desc "Push Theme"
  task :push do
    cmd = "compass compile -e production --force"
    puts cmd
    system cmd
    cmd = "rsync -avz  --exclude-from 'exclude.txt' --delete #{local_theme}/ #{ssh_alias}:#{remote_theme}/"
    puts cmd
    system cmd
  end
end

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
      # system cmd
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
      # system cmd
    end
  end
end

namespace :uploads do
  desc "Pull Uploads"
  task :pull do
    cmd = "rsync -avzr  #{ssh_alias}:#{remote_root}/wp-content/uploads/  #{local_wp}/wp-content/uploads/"
    puts cmd
    # system cmd
  end
  desc "Push Uploads"
  task :push do
    cmd = "rsync -avzr  #{local_wp}/wp-content/uploads/ #{ssh_alias}:#{remote_root}/wp-content/uploads/ "
    puts cmd
    # system cmd
  end
end

namespace :plugins do
  desc "Push Plugins"
  task :push do
    cmd = "rsync -avz #{local_plugins}/ #{ssh_alias}:#{remote_plugins}/"
    puts cmd
    # system cmd
  end
  desc "Pull Plugins"
  task :pull do
    cmd = "rsync -avz #{ssh_alias}:#{remote_plugins}/ #{local_plugins}/"
    puts cmd
    # system cmd
  end
end

# namespace :mu do
#   desc "Push MU Plugin"
#   task :push do
#     system( "rsync -avz  --exclude-from 'exclude.txt' --delete #{local_mu}/ #{ssh_alias}:#{remote_mu}/")
#   end
# end
