//
//  ChooseIssue.h
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "VariableStore.h"

@interface ChooseIssue : UIViewController
<UIPickerViewDataSource, UIPickerViewDelegate>


@property (strong, nonatomic) IBOutlet UIImageView *LocationImage;


@property (strong, nonatomic) IBOutlet UIPickerView *LocationPicker;

@property (strong, nonatomic) NSArray * Location;
@property (strong, nonatomic) IBOutlet UIButton *conti;

@end
