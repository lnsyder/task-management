# Task Management

Başlamadan Önce:

Projeyi yerel bilgisayarınızda çalıştırmak için aşağıdaki adımları takip edebilirsiniz:

### 1) Projeyi bilgisayarınıza klonlayın:
```
git clone https://github.com/lnsyder/task-management.git
cd task-management
```
### 2) Docker konteynerlarını ayağa kaldırın:
```
docker-compose up -d --build
```
### 3) Gerekli bağımlılıkları yükleyin:
```
docker exec -it symfony-app bash -c "composer install"
```
### 4) Veritabanı bilgilerini girin:
.env dosyasına aşağıdaki parametreyi ekleyin:
```
DATABASE_URL=postgresql://user:password@postgres:5432/postgres?charset=utf8
```
### 5) Veritabanını oluşturun ve gerekli verileri seeder'dan import edin:
```
docker exec -it symfony-app bash -c "bin/console make:migration"
docker exec -it symfony-app bash -c "bin/console doctrine:migrations:migrate"
docker exec -it symfony-app bash -c "bin/console app:seed-database"
```

### 6) Provider'ların tasklerinin çekilmesi için tetiklenmesi gereken komut:
```
docker exec -it symfony-app bash -c "bin/console app:get-task-list"
```

### Uygulama artık http://localhost/ adresinden erişilebilir olacaktır.

### Developerların toplam çalışma süreleri:

Developer1: 188

Developer2: 203

Developer3: 187

Developer4: 191

Developer5: 187


