import 'package:firstapp/views/common/welcomescreen2.dart';
import 'package:flutter/material.dart';
import 'package:firstapp/core/app_styles.dart';

class WelcomeScreen1 extends StatelessWidget {
  const WelcomeScreen1({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      
      body: ClipRRect(
        borderRadius: BorderRadius.circular(40), 
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            
            Container(
              margin: EdgeInsets.only(top: 415, left: 60, right: 60),
              child: Center(
                child: Column(
                  children: [
                    Text(
                      "مرحباً",
                      textAlign: TextAlign.center,
                      style:  AppFonts.bigtitlebold.copyWith(
                       color: AppColors.accent,
                           ),
                    ),
                    SizedBox(
                      height: 6,
                    ),
                  ],
                ),
              ),
            ),

            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 45, vertical: 20),
              child: Column(
                children: [
                  SizedBox(
                    width: double.infinity,
                    height: 55,
                    child: ElevatedButton(
                      style: ElevatedButton.styleFrom(
                        backgroundColor:  AppColors.primary,
                        shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(20),
                        ),
                      ),
                      onPressed: () {
                        Navigator.push(
                          context,
                          PageRouteBuilder(
                            pageBuilder:
                                (context, animation, secondaryAnimation) =>
                                    WelcomeScreen2(),
                            transitionsBuilder: (context, animation,
                                secondaryAnimation, child) {
                              const begin =
                                  Offset(-1.0, 0.0); 
                              const end =
                                  Offset.zero; 
                              const curve = Curves.easeInOut;

                              var tween = Tween(begin: begin, end: end)
                                  .chain(CurveTween(curve: curve));
                              var offsetAnimation = animation.drive(tween);

                              return SlideTransition(
                                position: offsetAnimation,
                                child: child,
                              );
                            },
                          ),
                        );
                      },
                      child:  Text(
                        'التالي',
                        style: AppFonts.subtitle.copyWith(
                       color: AppColors.secondary ),
                      ),
                    ),
                  ),
                  const SizedBox(height: 45),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      buildDot(true, () {
                        Navigator.pop(context);
                       
                      }),
                      const SizedBox(width: 10),
                      buildDot(false, null),
                      const SizedBox(width: 10),
                      buildDot(false, () {
                        Navigator.pop(context); 
                      }), // النقطة النشطة بدون وظيفة
                    ],
                  ),
                ],
              ),
            )
          ],
        ),
      ),
    );
  }

  Widget buildDot(bool isActive, Function()? onTap) {
    return GestureDetector(
      onTap: onTap, 
      child: Container(
        margin: EdgeInsets.only(top: 10),
        width: isActive ? 55 : 25,
        height: 25,
        decoration: BoxDecoration(
          color: isActive ? AppColors.secondary : AppColors.primary,
          borderRadius: BorderRadius.circular(13),
        ),
      ),
    );
  }
}
