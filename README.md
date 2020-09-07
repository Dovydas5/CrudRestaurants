# CrudRestaurants

### Docker
You will need docker from [here](https://docs.docker.com/engine/install/). Windows OS `docker-compose` installs automatically.

If you're using MacOS or Linux, download and install `docker-compose` from [here](https://github.com/docker/compose/releases).


### Start project by:


```bash
  $ git clone <project>
  $ cd path/to/<project>
  $ composer install
  rename .env.example to .env and change database information
  $ php artisan migrate
  $ docker-compose up -d
```
  
### What happened?
Open browser and go to 
```bash
http://127.0.0.1:8080
```
### To shutdown project

```bash
  $ cd path/to/<project>
  $ docker-compose down
```


### How to turn on virtualization

[Hyper-V](https://docs.microsoft.com/en-us/virtualization/hyper-v-on-windows/quick-start/enable-hyper-v#enable-hyper-v-using-powershell)

[BIOS virtualization](https://www.bleepingcomputer.com/tutorials/how-to-enable-cpu-virtualization-in-your-computer-bios/)
