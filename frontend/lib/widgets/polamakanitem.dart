import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';

class PolaMakanItem extends StatelessWidget {
  String img;
  String title;
  Function() onPress;

  PolaMakanItem(
      {required this.img, required this.title, required this.onPress});

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onPress,
      child: Container(
        decoration: BoxDecoration(
            color: bgColor,
            border: Border.all(
              color: Colors.black,
            ),
            borderRadius: BorderRadius.circular(10)),
        child: Column(
          children: [
            Container(
              margin: EdgeInsets.only(top: 14, left: 14, right: 14),
              width: double.infinity,
              decoration: BoxDecoration(color: primaryColor, boxShadow: [
                BoxShadow(
                    color: Colors.black.withOpacity(0.4),
                    blurRadius: 5,
                    offset: Offset(0, 3))
              ]),
              child: Container(
                height: 48.h,
                width: 71.w,
                decoration: BoxDecoration(
                    image: DecorationImage(image: AssetImage(img))),
              ),
            ),
            SizedBox(
              height: 12,
            ),
            Container(
              margin: EdgeInsets.symmetric(horizontal: 16),
              child: Text(
                title,
                style: poppinstext.copyWith(
                    fontSize: 12,
                    fontWeight: semiBold,
                    overflow: TextOverflow.ellipsis),
                maxLines: 1,
              ),
            )
          ],
        ),
      ),
    );
  }
}
