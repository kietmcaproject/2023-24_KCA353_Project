from django.db import models
from counsellors.models import counsellors

# Create your models here.
class courses(models.Model):
    counsellor_id=models.ForeignKey(counsellors, on_delete=models.DO_NOTHING)
    courses_id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=200)
    description=models.CharField(max_length=300,blank=True)
    duration = models.CharField(max_length=20)
    image=models.ImageField(upload_to='Coursesphotos/%Y/%m/%d/', blank=False)

    def __str__(self):
        return self.name
    def counsellorname(self):
        return self.counsellor_id.firstName+" "+self.counsellor_id.lastName

class CourseUnits(models.Model):
    course_id=models.ForeignKey(courses,on_delete=models.CASCADE,primary_key=True)
    unit1=models.FileField(upload_to='pdf')
    unit2=models.FileField(upload_to='pdf')
    unit3=models.FileField(upload_to='pdf')
    unit4=models.FileField(upload_to='pdf')
    unit5=models.FileField(upload_to='pdf')
    
    def __str__(self):
        return self.course_id.name