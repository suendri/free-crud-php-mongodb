db.createCollection("tb_categories")
db.createCollection("tb_posts")
db.createCollection("tb_users")

db.nama_collection.insert({
	"user_email" : "admin@gmail.com",
	"user_password" : "$2y$10$qGWIBW/kzAqy28kCCVDbXeIx73j0zd5QGgoh0RV7Mz9YzKYnMJZGC",
	"user_full_name" : "Administrator"
})