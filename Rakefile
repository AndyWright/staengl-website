require 'rake/testtask'

namespace :deploy do
  desc "deploy site to server"
  task :site do
    system "compass compile -c compass_config.rb --output-style compressed --force"
    system "rsync -avz -e ssh site/. tg-admin:/usr/share/nginx/www"
  end

  # super lame deployment
  desc "deploy api to server"
  task :api do
    system "rsync -avz -e ssh api/app.rb api/config.ru api/unicorn.rb api/Gemfile tg-admin:/usr/share/nginx/api"
    puts "now don't forget to ssh to the server and to restart the app"
  end
end

namespace :test do
  desc "run api tests"
  task :api do
    test_task = Rake::TestTask.new("alltests") do |t|
      t.test_files = Dir.glob(File.join("api", "test", "**", "*_test.rb"))
    end
    task("alltests").execute
  end
end