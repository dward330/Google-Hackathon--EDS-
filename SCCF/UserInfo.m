//
//  UserInfo.m
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "UserInfo.h"
#import "Summary.h"



@implementation UserInfo


-(IBAction)ReturnKeyButton:(id)sender {
    [sender resignFirstResponder];
    

}

- (IBAction)updateStuff:(UIButton *)sender {
    
    if(_f_Name.text != nil){
        [[VariableStore sharedInstance] setFName :_f_Name.text];
    }
    
    if(_l_Name.text != nil){
        [[VariableStore sharedInstance] setLName :_l_Name.text];
    }
    
    if(_email_A.text != nil){
        [[VariableStore sharedInstance] setEMail :_email_A.text];
    }
    
    if(_p_Num.text != nil){
        [[VariableStore sharedInstance] setPNum :_p_Num.text];
    }
    
    if(_zip_C.text != nil){
        [[VariableStore sharedInstance] setZip :_zip_C.text];
    }
    
    Summary *secondViewController =
    [self.storyboard instantiateViewControllerWithIdentifier:@"nextOne"];
    [self presentViewController:secondViewController animated:YES completion:nil];

    
}

- (void)viewDidLoad {
    
    _f_Name.text = [self readFNFromFile];
    _l_Name.text = [self readLNFromFile];
    _p_Num.text = [self readPNFromFile];
    _email_A.text = [self readEMFromFile];
    _zip_C.text = [self readZCFromFile];
    
    
    [super viewDidLoad];
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}



//TRY TO LOAD SAVED USER INFO

- (NSString*)readFNFromFile {
    
    // Build the path...
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"fName.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    // The main act...
    return [[NSString alloc] initWithData:[NSData dataWithContentsOfFile:fileAtPath] encoding:NSUTF8StringEncoding];
}

- (NSString*)readLNFromFile {
    
    // Build the path...
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"lName.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    // The main act...
    return [[NSString alloc] initWithData:[NSData dataWithContentsOfFile:fileAtPath] encoding:NSUTF8StringEncoding];
}

- (NSString*)readPNFromFile {
    
    // Build the path...
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"pNum.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    // The main act...
    return [[NSString alloc] initWithData:[NSData dataWithContentsOfFile:fileAtPath] encoding:NSUTF8StringEncoding];
}

- (NSString*)readEMFromFile {
    
    // Build the path...
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"eMail.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    // The main act...
    return [[NSString alloc] initWithData:[NSData dataWithContentsOfFile:fileAtPath] encoding:NSUTF8StringEncoding];
}

- (NSString*)readZCFromFile {
    
    // Build the path...
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"zCode.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    // The main act...
    return [[NSString alloc] initWithData:[NSData dataWithContentsOfFile:fileAtPath] encoding:NSUTF8StringEncoding];
}

-(void) touchesBegan:(NSSet *)touches withEvent:(UIEvent *)event{
    
    [self.view endEditing:YES];
    
}


@end
