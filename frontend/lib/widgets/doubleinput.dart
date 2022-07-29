import 'package:diabetesapps/widgets/inputprofile.dart';
import 'package:flutter/material.dart';

class DoubleInput extends StatelessWidget {
  String label1;
  String label2;
  String hint1;
  String hint2;
  TextEditingController? controller1;
  TextEditingController? controller2;

  DoubleInput(
      {required this.label1,
      required this.label2,
      required this.hint1,
      this.controller1,
      this.controller2,
      required this.hint2});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.only(bottom: 10),
      width: MediaQuery.of(context).size.width,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Container(
            width: (MediaQuery.of(context).size.width * 0.5) - 12 - 24,
            child: ProfileInput(
              controller: controller1,
              hint: hint1,
              label: label1,
            ),
          ),
          Container(
            width: (MediaQuery.of(context).size.width * 0.5) - 12 - 24,
            child: ProfileInput(
              controller: controller2,
              hint: hint2,
              label: label2,
            ),
          ),
        ],
      ),
    );
  }
}
