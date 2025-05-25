import 'question.dart';

class AppBrain {
  int _questionNumber = 0;

  List<Question> _questionGroup = [
    Question('عدد الكواكب في المجموعة الشمسية هو ثمانية كواكب',
        'images/image-1.jpg', true),
    Question('القطط هي حيوانات لاحمة', 'images/image-2.jpg', true),
    Question('الصين موجودة في القارة الإفريقية', 'images/image-3.jpg', false),
    Question('الأرض مسطحة وليست كروية', 'images/image-4.jpg', false),
    Question('   باستطاعة الانسان البقاء على قيد الحياة بدون أكل اللحوم',
        'images/image-5.jpg', true),
    Question('الشمس تدور حول الأرض و الأرض تدور حول القمر ',
        'images/image-6.jpg', false),
    Question('الحيوانات لا تشعر بالألم ', 'images/image-7.jpg', false),
  ];
  void nextQuestion() {
    if (_questionNumber < _questionGroup.length - 1) {
      _questionNumber++;
    }
  }

  String getQuestionText() {
    return _questionGroup[_questionNumber].questionText;
  }

  String getQuestionImage() {
    return _questionGroup[_questionNumber].questionImage;
  }

  bool getQuestionAnswer() {
    return _questionGroup[_questionNumber].questionAnswer;
  }

  bool isFinished() {
    if (_questionNumber >= _questionGroup.length - 1) {
      return true;
    } else {
      return false;
    }
  }

  void reset() {
    _questionNumber = 0;
  }
}
