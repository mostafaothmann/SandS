import 'package:flutter/material.dart';
import 'app_brain.dart';
import 'package:rflutter_alert/rflutter_alert.dart';

AppBrain appBrain = AppBrain();
void main() {
  runApp(ExamApp());
}

class ExamApp extends StatelessWidget {
  const ExamApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        backgroundColor: Colors.grey[300],
        appBar: AppBar(
          backgroundColor: Colors.grey,
          title: Text("اختبار "),
        ),
        body: Padding(
          padding: const EdgeInsets.all(15.0),
          child: ExamPage(),
        ),
      ),
    );
  }
}

class ExamPage extends StatefulWidget {
  const ExamPage({super.key});

  @override
  State<ExamPage> createState() => _ExamPageState();
}

class _ExamPageState extends State<ExamPage> {
  List<Widget> answerResult = [];
  int rightAnswer = 0;
  void checkAnswer(bool whatUserPicked) {
    setState(() {
      bool correctAnswer = appBrain.getQuestionAnswer();
      if (whatUserPicked == correctAnswer) {
        rightAnswer++;
        answerResult.add(Padding(
          padding: const EdgeInsets.all(10.0),
          child: Icon(
            Icons.thumb_up,
            color: Colors.green,
          ),
        ));
      } else {
        answerResult.add(Padding(
          padding: const EdgeInsets.all(10.0),
          child: Icon(
            Icons.thumb_down,
            color: Colors.red,
          ),
        ));
      }
      if (appBrain.isFinished() == true) {
        Alert(
          context: context,
          title: "الأختبار قد انتهى",
          desc: "لقد أجبت على $rightAnswer أسئلة بشكل صحيح من أصل 7 أسئلة ",
          buttons: [
            DialogButton(
              child: Text(
                "أبدأ من جديد",
                style: TextStyle(color: Colors.white, fontSize: 20),
              ),
              onPressed: () => Navigator.pop(context),
              width: 120,
            )
          ],
        ).show();
        appBrain.reset();
        answerResult = [];
        rightAnswer = 0;
      } else {
        appBrain.nextQuestion();
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        Row(
          children: answerResult,
        ),
        Expanded(
          flex: 5,
          child: Column(
            children: [
              Image.asset(appBrain.getQuestionImage()),
              SizedBox(
                height: 25.0,
              ),
              Text(
                appBrain.getQuestionText(),
                textAlign: TextAlign.center,
                style: TextStyle(
                  fontSize: 25.0,
                  color: Colors.black,
                ),
              )
            ],
          ),
        ),
        Padding(
          padding: const EdgeInsets.symmetric(vertical: 10.0),
          child: Expanded(
              child: FloatingActionButton(
                  child: Text(
                    "صح",
                    style: TextStyle(color: Colors.white, fontSize: 30.0),
                  ),
                  backgroundColor: Colors.indigo,
                  onPressed: () {
                    setState(() {
                      checkAnswer(true);
                    });
                  })),
        ),
        Padding(
          padding: const EdgeInsets.symmetric(vertical: 10.0),
          child: Expanded(
              child: FloatingActionButton(
                  child: Text(
                    "خطأ",
                    style: TextStyle(color: Colors.white, fontSize: 30.0),
                  ),
                  backgroundColor: Colors.deepOrange,
                  onPressed: () {
                    setState(() {
                      checkAnswer(false);
                    });
                  })),
        ),
      ],
    );
  }
}
