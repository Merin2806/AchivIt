# 🎓 Achivit – Student Achievement Management System

Achivit is a Laravel-based Student Achievement Management System developed as part of the Department Internship Project. It provides a centralized platform where students can submit their academic and extracurricular achievements, and faculty members can review, approve, or reject submissions with remarks.

---

## 📌 Features

### 👨‍🎓 Student Module
- Secure Student Login
- Dynamic Dashboard
- Profile Management
- Submit New Achievements
- Upload Achievement Certificates (PDF/Image)
- View Achievement History
- Track Submission Status
- View Faculty Remarks

### 👩‍🏫 Faculty Module
- Secure Faculty Login
- Faculty Dashboard
- View Pending Achievement Requests
- Review Student Submissions
- View Uploaded Certificates
- Approve or Reject Achievements
- Add Remarks for Students
- Automatic Dashboard Updates

---

## 🛠 Tech Stack

| Technology     | Used                     |
|----------------|------------------------- |
| Laravel 13     | Backend Framework        |
| PHP 8.4        | Server-side Language     |
| MySQL          | Database                 |
| Blade          | Templating Engine        |
| Tailwind CSS   | Frontend Styling         |
| HTML5          | Markup                   |
| CSS3           | Styling                  |
| JavaScript     | Client-side Interactions |
| Git & GitHub   | Version Control          |

---

## 📂 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   ├── Requests/
├── Models/

resources/
├── views/
│   ├── student/
│   ├── faculty/
│   ├── layouts/

routes/
database/
storage/
```

---

## ⚙ Installation

### Clone Repository

```bash
git clone https://github.com/yourusername/achivit.git
```

Go inside project

```bash
cd achivit
```

Install dependencies

```bash
composer install
npm install
```

Create environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure database inside `.env`

```env
DB_DATABASE=achivit
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations

```bash
php artisan migrate
```

Create storage link

```bash
php artisan storage:link
```

Build frontend assets

```bash
npm run build
```

Run the application

```bash
php artisan serve
```

---

## 📁 File Upload

Uploaded certificates are stored in

```
storage/app/public/achievements
```

They are publicly accessible through

```
public/storage/achievements
```

using

```bash
php artisan storage:link
```

---

## 🔄 System Workflow

```
Student Login
        │
        ▼
Submit Achievement
        │
        ▼
Upload Certificate
        │
        ▼
Achievement Stored in Database
        │
        ▼
Assigned to Faculty Coordinator
        │
        ▼
Faculty Reviews Submission
        │
        ▼
Approve / Reject + Remark
        │
        ▼
Student Dashboard & History Updated
```

---

## 📸 Modules

### Student
- Dashboard
- Submit Achievement
- Achievement History
- Profile

### Faculty
- Dashboard
- Review Achievement
- Approve/Reject Requests

---

## ✨ Highlights

- Role-Based Authentication
- Dynamic Dashboards
- File Upload Support
- Faculty Assignment Based on Department & Domain
- Certificate Preview
- Approval Workflow
- Status Tracking
- Responsive UI
- Pagination Support

---

## 👩‍💻 Developed By

**Merin Joys**

Department Internship Project

Fr. C. Rodrigues Institute of Technology (FCRIT)

Information Technology Department

---

## 🔑 Test Credentials

### Student

Email: merinjoys28@gmail.com
Password: 1234567890

### Faculty

Email: priya.nair@fcrit.ac.in
Password: Password@123