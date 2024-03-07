# Generated by Django 4.2.5 on 2023-11-13 13:57

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('students', '0002_enrolledcourses'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='students',
            name='counsellor_id',
        ),
        migrations.RemoveField(
            model_name='students',
            name='courses_id',
        ),
        migrations.RemoveField(
            model_name='students',
            name='password',
        ),
        migrations.AddField(
            model_name='students',
            name='profile_picture',
            field=models.ImageField(default=None, upload_to=''),
        ),
    ]