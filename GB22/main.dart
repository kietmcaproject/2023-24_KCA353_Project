import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'model/student.dart';
import 'screens/timetable_screen.dart';
import 'screens/marks_screen.dart';
import 'screens/attendance_screen.dart';
import 'screens/home_page.dart';
import 'screens/login_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (ctx) => Student(
          name: '---',
          roll: '---',
          cls: '---',
          batch: '0',
          designation: '---',
          email: '---',
          semester: 0,
          attendance: 0,
          subjects: [],
          token: ''),
      child: MaterialApp(
        title: 'ERP',
        theme: ThemeData(
          primarySwatch: Colors.teal,
          primaryColor: Colors.tealAccent.shade400,
          textTheme: ThemeData.light().textTheme.copyWith(
                bodyText1: const TextStyle(
                  color: Colors.white,
                  fontSize: 18,
                ),
                bodyText2: const TextStyle(
                  color: Colors.white,
                  fontSize: 16,
                ),
                headline5: const TextStyle(
                  color: Colors.black,
                  fontWeight: FontWeight.bold,
                ),
              ),
          appBarTheme: const AppBarTheme(
            color: Color(0xFF9090FC),
          ),
        ),
        home: const LoginPage(),
        routes: {
          LoginPage.routeName: (ctx) => const LoginPage(),
          HomePage.routeName: (ctx) => const HomePage(),
          AttendanceScreen.routeName: (ctx) => const AttendanceScreen(),
          MarksScreen.routeName: (ctx) => const MarksScreen(),
          TimeTableScreen.routeName: (ctx) => const TimeTableScreen(),
        },
      ),
    );
  }
}
